from sqlalchemy import create_engine

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
    id = Column(Integer, primary_key=True)
    username = Column(String(256))
    password = Column(String(256))
    email = Column(String(256))
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
    rental_price = Column(DECIMAL)
    property_type = Column(String(256))
    amenities = Column(Text)

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