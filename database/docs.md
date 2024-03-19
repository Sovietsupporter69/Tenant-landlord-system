# Database docs

## Make database

1) install mariadb/mysql
2) create user account with

```sql
CREATE USER tms@127.0.0.1 IDENTIFIED BY 'tms';
```

3) create schema with

```sql
CREATE DATABASE tms;
```

## setup python

1) navigate to this folder
2) create a venv with python
3) run `pip install requirements.txt`

## create database tables

1) run `python main.py`