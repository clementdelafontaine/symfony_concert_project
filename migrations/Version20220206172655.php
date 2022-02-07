<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220206172655 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist CHANGE info info VARCHAR(255) DEFAULT \'NULL\', CHANGE picture picture VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE band CHANGE style style VARCHAR(15) DEFAULT \'NULL\', CHANGE info info VARCHAR(256) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE concert CHANGE name name VARCHAR(255) NOT NULL, CHANGE info info VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE concert_hall CHANGE picture picture VARCHAR(255) DEFAULT \'NULL\', CHANGE adress adress VARCHAR(255) DEFAULT \'NULL\', CHANGE info info VARCHAR(255) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE establishment CHANGE info info VARCHAR(255) DEFAULT \'NULL\', CHANGE logo logo VARCHAR(255) DEFAULT \'NULL\', CHANGE telephone telephone VARCHAR(10) DEFAULT \'NULL\'');
        $this->addSql('ALTER TABLE management CHANGE telephone telephone VARCHAR(20) DEFAULT \'NULL\', CHANGE town town VARCHAR(30) DEFAULT \'NULL\', CHANGE zipcode zipcode VARCHAR(5) DEFAULT \'NULL\'');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE artist CHANGE info info VARCHAR(1024) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE picture picture VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE band CHANGE style style VARCHAR(15) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE info info VARCHAR(1024) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE concert CHANGE name name VARCHAR(1024) CHARACTER SET utf8 NOT NULL COLLATE `utf8_unicode_ci`, CHANGE info info VARCHAR(1024) CHARACTER SET utf8 DEFAULT \'NULL\' COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE concert_hall CHANGE picture picture VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE adress adress VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE info info VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE establishment CHANGE info info VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE logo logo VARCHAR(255) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE telephone telephone VARCHAR(10) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`');
        $this->addSql('ALTER TABLE management CHANGE telephone telephone VARCHAR(20) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE town town VARCHAR(30) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`, CHANGE zipcode zipcode VARCHAR(5) CHARACTER SET utf8 DEFAULT NULL COLLATE `utf8_unicode_ci`');
    }
}
