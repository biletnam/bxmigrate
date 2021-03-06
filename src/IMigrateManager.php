<?php

namespace marvin255\bxmigrate;

/**
 * Объект для управления миграциями. Получает ссылки на хранилище миграций и объект для проверки статуса миграций.
 * Умеет все то же самое, что оба объекта по раздельности: применять миграции, откатывать, создавать новые.
 * Просто передает управление нужному объекту.
 */
interface IMigrateManager
{
    /**
     * В конструкторе передаем ссылки на хранилище миграций и объект для проверки статуса миграций.
     *
     * @param \marvin255\bxmigrate\IMigrateRepo     $repo
     * @param \marvin255\bxmigrate\IMigrateChecker  $checker
     * @param \marvin255\bxmigrate\IMigrateNotifier $notifier
     */
    public function __construct(\marvin255\bxmigrate\IMigrateRepo $repo, \marvin255\bxmigrate\IMigrateChecker $checker, \marvin255\bxmigrate\IMigrateNotifier $notifier);

    /**
     * Применяет все миграции, если $count пустой, или указанное в $count количество миграций,
     * которые не значатся в качестве примененных.
     *
     * @param int $count
     */
    public function up($count = null);

    /**
     * Откатывает последнюю миграцию, если $count пустой, или указанное в $count количество  последних миграций,
     * которые значатся в качестве примененных.
     *
     * @param int $count
     */
    public function down($count = null);

    /**
     * Создает новую миграцию с указанным именем.
     *
     * @param string $name
     */
    public function create($name);
}
