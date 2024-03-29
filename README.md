# Tenant-landlord-system

The "Tenant Management System" is a system designed to manage the relationship between tenants and landlords. Basic functionality includes the ability for landlords to upload property listings, contract information and manage maintenance requests. Tenants can browse properties, view payment history and submit maintenance requests.

## Target userbase

The system has 3 target users:
  - Tenant
  - Landlord
  - Prospective Landlord/Tenant

![Use Case Diagram](diagrams/use-case.png)

Prospective Tenants/Landlords should be able to create an account on the system using an email and password.

All users can receive an authentication code via email in case they forget their password as part of an automated password reset system.

## Database Design

![Entity Relationship Diagram](diagrams/class-diagram.png)