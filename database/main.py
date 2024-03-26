from sqlalchemy import create_engine

GEN_DATA = True

USER = 'tms'
PASSWORD = 'tms'
HOST = '127.0.0.1'
PORT = 3306
DBNAME = 'tms'

DB_URL = fr'mysql+pymysql://{USER}:{PASSWORD}@{HOST}:{PORT}/{DBNAME}'

engine = create_engine(DB_URL, echo=True)
conn = engine.connect()

from sqlalchemy.orm import declarative_base, relationship
from sqlalchemy import Integer, String, Enum, CHAR, Column, ForeignKey, DECIMAL, Date, Text, DateTime

Base = declarative_base()

class User(Base):
    __tablename__ = 'user'
    id = Column(Integer, primary_key=True, autoincrement=True)
    username = Column(String(256))
    password = Column(String(256))
    email = Column(String(256), unique=True)
    type = Column(Enum('landlord', 'tenant'))

    properties = relationship("Property", back_populates="landlord")
    leases = relationship("Lease", back_populates="tenant")
    maintenance_requests = relationship("MaintenanceRequest", back_populates="tenant")
    sent_messages = relationship("Message", foreign_keys="[Message.sender_id]", back_populates="sender")
    received_messages = relationship("Message", foreign_keys="[Message.receiver_id]", back_populates="receiver")
    reports = relationship("Report", back_populates="landlord")

class Property(Base):
    __tablename__ = 'property'
    id = Column(Integer, primary_key=True)
    landlord_id = Column(Integer, ForeignKey('user.id'))
    address = Column(String(256))
    postcode = Column(String(16))
    rental_price = Column(DECIMAL)
    property_type = Column(String(256))
    num_bedrooms = Column(Integer)
    num_bathrooms = Column(Integer)
    description = Column(Text)

    landlord = relationship("User", back_populates="properties")
    images = relationship("PropertyImage", back_populates="property")
    documents = relationship("Document", back_populates="property")
    leases = relationship("Lease", back_populates="property")
    maintenance_requests = relationship("MaintenanceRequest", back_populates="property")

class PropertyImage(Base):
    __tablename__ = 'property_image'
    id = Column(Integer, primary_key=True)
    property_id = Column(Integer, ForeignKey('property.id'))
    image_path = Column(String(256))

    property = relationship("Property", back_populates="images")

class Document(Base):
    __tablename__ = 'document'
    id = Column(Integer, primary_key=True)
    property_id = Column(Integer, ForeignKey('property.id'))
    document_type = Column(String(256))
    file_path = Column(String(1024))

    property = relationship("Property", back_populates="documents")

class Lease(Base):
    __tablename__ = 'lease'
    id = Column(Integer, primary_key=True)
    property_id = Column(Integer, ForeignKey('property.id'))
    tenant_id = Column(Integer, ForeignKey('user.id'))
    start_date = Column(Date)
    end_date = Column(Date)
    digital_signature = Column(Text)

    property = relationship("Property", back_populates="leases")
    tenant = relationship("User", back_populates="leases")
    payments = relationship("Payment", back_populates="lease")

class Payment(Base):
    __tablename__ = 'payment'
    id = Column(Integer, primary_key=True)
    lease_id = Column(Integer, ForeignKey('lease.id'))
    amount = Column(DECIMAL)
    payment_date = Column(Date)
    payment_method = Column(String(128))

    lease = relationship("Lease", back_populates="payments")

class MaintenanceRequest(Base):
    __tablename__ = 'maintenance_request'
    id = Column(Integer, primary_key=True)
    property_id = Column(Integer, ForeignKey('property.id'))
    tenant_id = Column(Integer, ForeignKey('user.id'))
    description = Column(Text)
    urgency = Column(String(128))

    property = relationship("Property", back_populates="maintenance_requests")
    tenant = relationship("User", back_populates="maintenance_requests")

class Message(Base):
    __tablename__ = 'message'
    id = Column(Integer, primary_key=True)
    sender_id = Column(Integer, ForeignKey('user.id'))
    receiver_id = Column(Integer, ForeignKey('user.id'))
    content = Column(Text)
    sent_at = Column(DateTime)

    sender = relationship("User", foreign_keys=[sender_id], back_populates="sent_messages")
    receiver = relationship("User", foreign_keys=[receiver_id], back_populates="received_messages")

class Report(Base):
    __tablename__ = 'report'
    id = Column(Integer, primary_key=True)
    landlord_id = Column(Integer, ForeignKey('user.id'))
    report_type = Column(String(128))
    generated_at = Column(DateTime)

    landlord = relationship("User", back_populates="reports")

Base.metadata.create_all(engine)

from sqlalchemy import insert

if (GEN_DATA) :
    # users
    conn.execute(insert(User).values(username = "john doe", password = "passwd", email="john.doe@example.com", type="tenant"))
    conn.execute(insert(User).values(username = "jane doe", password = "passwd", email="jane.doe@example.com", type="landlord"))

    conn.execute(insert(User).values(username = "alex smith", password = "password123", email="alex.smith@example.com", type="tenant"))
    conn.execute(insert(User).values(username = "mike brown", password = "mypassword", email="mike.brown@example.net", type="tenant"))
    conn.execute(insert(User).values(username = "chris jones", password = "1234password", email="chris.jones@example.org", type="tenant"))

    conn.execute(insert(User).values(username = "sarah green", password = "pass1234", email="sarah.green@example.net", type="landlord"))
    conn.execute(insert(User).values(username = "lisa white", password = "securepass", email="lisa.white@example.com", type="landlord"))
    conn.execute(insert(User).values(username = "emma taylor", password = "password5678", email="emma.taylor@example.org", type="landlord"))

    # properties
    conn.execute(insert(Property).values(landlord_id="2", address="1 church lane", postcode="SW11 5AD", rental_price="1300", property_type="detached", num_bedrooms="3", num_bathrooms="2", description="Charming cottage with spacious rooms and a cozy atmosphere."))
    conn.execute(insert(Property).values(landlord_id="2", address="24 Baker Street", postcode="NW1 6XE", rental_price="1500", property_type="semi-detached", num_bedrooms="2", num_bathrooms="1", description="Modern apartment with stylish interiors and a balcony overlooking the city."))
    conn.execute(insert(Property).values(landlord_id="2", address="76 High Street", postcode="SE1 1NH", rental_price="1200", property_type="flat", num_bedrooms="4", num_bathrooms="3", description="Luxurious villa with a swimming pool, garden, and breathtaking views of the mountains."))

    conn.execute(insert(Property).values(landlord_id="6", address="58 Victoria Road", postcode="SW1 1AD", rental_price="1400", property_type="detached", num_bedrooms="1", num_bathrooms="1", description="Quaint studio flat in a historic building, perfect for a solo adventurer."))
    conn.execute(insert(Property).values(landlord_id="6", address="102 Hill Road", postcode="NW3 2AL", rental_price="1600", property_type="terrace", num_bedrooms="5", num_bathrooms="4", description="Elegant mansion boasting grandeur architecture and lavish amenities."))
    conn.execute(insert(Property).values(landlord_id="7", address="33 Queen Street", postcode="W1 8HL", rental_price="1350", property_type="flat", num_bedrooms="2", num_bathrooms="2", description="Cosy townhouse with a fireplace, ideal for enjoying chilly evenings."))
    conn.execute(insert(Property).values(landlord_id="8", address="67 Park Avenue", postcode="SW2 4ER", rental_price="1550", property_type="semi-detached", num_bedrooms="3", num_bathrooms="2", description="Contemporary loft with an open floor plan and plenty of natural light."))


conn.commit()