@echo off

php ../vendor/propel/propel/bin/propel sql:build --schema-dir="schema" --output-dir="sql" --overwrite
php ../vendor/propel/propel/bin/propel sql:build --schema-dir="schema" --output-dir="../isys/estic/sql" --overwrite
