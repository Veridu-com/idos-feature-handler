phinx-migrate:
	../vendor/bin/phinx migrate --configuration ../phinx.yml

phinx-rollback:
	../vendor/bin/phinx rollback --configuration ../phinx.yml

phinx-seed:
	../vendor/bin/phinx seed:run --configuration ../phinx.yml

phinx-restore: phinx-migrate phinx-seed
