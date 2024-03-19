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

4) give user permissions

```sql
GRANT ALL PRIVILEGES ON tms.* TO tms@127.0.0.1 IDENTIFIED BY 'tms';
```
This could be made more secure

5) flush permissions

```sql
flush privileges;
```

## setup python

1) navigate to this folder
2) create a venv with python
3) run `pip install requirements.txt`

## create database tables

1) run `python main.py`