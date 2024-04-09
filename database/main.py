from sqlalchemy import create_engine
import datetime

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
from sqlalchemy import Integer, String, Enum, CHAR, Column, ForeignKey, DECIMAL, Date, Text, DateTime, LargeBinary

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
    id = Column(Integer, primary_key=True, autoincrement=True)
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
    id = Column(Integer, primary_key=True, autoincrement=True)
    property_id = Column(Integer, ForeignKey('property.id'))
    image_path = Column(String(64))

    property = relationship("Property", back_populates="images")

class Document(Base):
    __tablename__ = 'document'
    id = Column(Integer, primary_key=True, autoincrement=True)
    property_id = Column(Integer, ForeignKey('property.id'))
    document_type = Column(String(256))
    file_path = Column(String(1024))

    property = relationship("Property", back_populates="documents")

class Lease(Base):
    __tablename__ = 'lease'
    id = Column(Integer, primary_key=True, autoincrement=True)
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
    id = Column(Integer, primary_key=True, autoincrement=True)
    lease_id = Column(Integer, ForeignKey('lease.id'))
    amount = Column(DECIMAL)
    payment_date = Column(Date)
    payment_method = Column(String(128))

    lease = relationship("Lease", back_populates="payments")

class MaintenanceRequest(Base):
    __tablename__ = 'maintenance_request'
    id = Column(Integer, primary_key=True, autoincrement=True)
    property_id = Column(Integer, ForeignKey('property.id'))
    tenant_id = Column(Integer, ForeignKey('user.id'))
    title = Column(String(128))
    description = Column(Text)
    urgency = Column(String(128))
    open_date = Column(Date)
    close_date = Column(Date)

    property = relationship("Property", back_populates="maintenance_requests")
    tenant = relationship("User", back_populates="maintenance_requests")

class Message(Base):
    __tablename__ = 'message'
    id = Column(Integer, primary_key=True, autoincrement=True)
    sender_id = Column(Integer, ForeignKey('user.id'))
    receiver_id = Column(Integer, ForeignKey('user.id'))
    content = Column(Text)
    sent_at = Column(DateTime)

    sender = relationship("User", foreign_keys=[sender_id], back_populates="sent_messages")
    receiver = relationship("User", foreign_keys=[receiver_id], back_populates="received_messages")

class Report(Base):
    __tablename__ = 'report'
    id = Column(Integer, primary_key=True, autoincrement=True)
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

    # property images
    conn.execute(insert(PropertyImage).values(property_id=1, image_path="03046e52512591ef0d9f3ebe21d3a57d"))
    conn.execute(insert(PropertyImage).values(property_id=1, image_path="73be7f23c8c9ce5d1b58fcdde33fcf15"))
    conn.execute(insert(PropertyImage).values(property_id=1, image_path="8b3d0b3a9dc7027cc4b926ea91edfa29"))
    conn.execute(insert(PropertyImage).values(property_id=2, image_path="18cead07d1b53ed74a2262d8f048410a"))
    conn.execute(insert(PropertyImage).values(property_id=2, image_path="f1f88913a7d278fb6bf754afa49feb96"))
    conn.execute(insert(PropertyImage).values(property_id=2, image_path="c638ac502c39bdc0d967824a07959db3"))
    conn.execute(insert(PropertyImage).values(property_id=3, image_path="36cda2ad1e1efc3c98a19ea8414459fe"))
    conn.execute(insert(PropertyImage).values(property_id=3, image_path="60fa48b8c9082a548ab78cbe05e4f759"))
    conn.execute(insert(PropertyImage).values(property_id=3, image_path="760d5048e3bf42f074f97b78394f619d"))
    conn.execute(insert(PropertyImage).values(property_id=4, image_path="dc0ebe44892a0a87112809dcaa220025"))
    conn.execute(insert(PropertyImage).values(property_id=4, image_path="75e81f2163a46d8cf42f3fa43aaef3fc"))
    conn.execute(insert(PropertyImage).values(property_id=4, image_path="11630caf76568fd0af10ccd08c0f6139"))
    conn.execute(insert(PropertyImage).values(property_id=5, image_path="481f6a2c3c56e795074bb99dc23f634f"))
    conn.execute(insert(PropertyImage).values(property_id=5, image_path="329ee67dd0efd29f1086ee3e44f806ff"))
    conn.execute(insert(PropertyImage).values(property_id=5, image_path="4a1971f1ac323dc2f2567e189600e64a"))
    conn.execute(insert(PropertyImage).values(property_id=6, image_path="6d78459c8ed078b7e1df397915153dc9"))
    conn.execute(insert(PropertyImage).values(property_id=6, image_path="8e8cc0b86603cd4534f2aa202c1176d7"))
    conn.execute(insert(PropertyImage).values(property_id=6, image_path="c61fda6acba701e46f9a94cb965e87fb"))
    conn.execute(insert(PropertyImage).values(property_id=7, image_path="51d271bca6b084c10bb4c0b0278d5f05"))
    conn.execute(insert(PropertyImage).values(property_id=7, image_path="af36ef6585c48eefe651117710f5cca5"))
    conn.execute(insert(PropertyImage).values(property_id=7, image_path="4d4bfa5e009d0a0d47d02a20b13c282b"))

    # Lease
    conn.execute(insert(Lease).values(property_id="4", tenant_id=2, start_date=datetime.date(2020, 2, 15), end_date=datetime.date(2025, 8, 15), digital_signature="---"))
    conn.execute(insert(Lease).values(property_id="5", tenant_id=3, start_date=datetime.date(2020, 3, 20), end_date=datetime.date(2025, 9, 20), digital_signature="---"))
    conn.execute(insert(Lease).values(property_id="6", tenant_id=1, start_date=datetime.date(2020, 4, 10), end_date=datetime.date(2025, 10, 10), digital_signature="---"))
    conn.execute(insert(Lease).values(property_id="7", tenant_id=4, start_date=datetime.date(2020, 5, 5), end_date=datetime.date(2025, 11, 5), digital_signature="---"))
    conn.execute(insert(Lease).values(property_id="1", tenant_id=2, start_date=datetime.date(2020, 6, 8), end_date=datetime.date(2025, 12, 8), digital_signature="---"))
    conn.execute(insert(Lease).values(property_id="2", tenant_id=3, start_date=datetime.date(2020, 7, 12), end_date=datetime.date(2026, 1, 12), digital_signature="---"))
    conn.execute(insert(Lease).values(property_id="3", tenant_id=4, start_date=datetime.date(2020, 8, 25), end_date=datetime.date(2026, 2, 25), digital_signature="---"))

    # Maintenance
    conn.execute(insert(MaintenanceRequest).values(property_id="6", tenant_id=1, title="Broken toilet", description="My toilet has stopped flushing so I need it fixed ASAP", urgency="High", open_date=datetime.date(2022, 6, 30), close_date=datetime.date(2022, 7, 3)))
    conn.execute(insert(MaintenanceRequest).values(property_id="6", tenant_id=1, title="Broken boiler", description="The boiler has stopped making hot water, found out when trying to take a shower", urgency="High", open_date=datetime.date(2023, 7, 6), close_date=datetime.date(2023, 7, 8)))
    conn.execute(insert(MaintenanceRequest).values(property_id="6", tenant_id=1, title="Taps broken", description="The kitchen sink tap has stopped and it doesn't seem cloged so it might be something important", urgency="Medium", open_date=datetime.date(2023, 10, 13), close_date=datetime.date(2023, 10, 18)))
    conn.execute(insert(MaintenanceRequest).values(property_id="6", tenant_id=1, title="Light went out", description="One of the lights in the living room has gone out and I cant reach it myself", urgency="Low", open_date=datetime.date(2024, 1, 15), close_date=datetime.date(2024, 1, 27)))

conn.commit()