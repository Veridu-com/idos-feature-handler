<?php

use Phinx\Migration\AbstractMigration;

class CreateExtensions extends AbstractMigration
{
    public function up() {
        $this->execute('CREATE EXTENSION IF NOT EXISTS fuzzystrmatch');
        $this->execute('CREATE EXTENSION IF NOT EXISTS pgcrypto');
        $this->execute('CREATE EXTENSION IF NOT EXISTS unaccent');
    }

    public function down() {
        $this->execute('DROP EXTENSION IF EXISTS fuzzystrmatch');
        $this->execute('DROP EXTENSION IF EXISTS pgcrypto');
        $this->execute('DROP EXTENSION IF EXISTS unaccent');
    }
}
