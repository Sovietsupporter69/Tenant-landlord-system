#database
cat database/initial.sql | mysql --host 127.0.0.1 -u root --password=mariadb
/usr/local/python/current/bin/python3.10 -m pip install -r database/requirements.txt
/usr/local/python/current/bin/python3.10 database/main.py