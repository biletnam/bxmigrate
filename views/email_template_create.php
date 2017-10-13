<?php echo "<?php\r\n"; ?>

/**
 * Миграция для создания шаблона почтового сообщения для события '<?php echo ucfirst($smart_param_1); ?>'.
 */
class <?php echo $name; if (!empty($parentClass)) {
    echo " extends {$parentClass}";
} echo "\r\n"; ?>
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        return $this->createEmailTemplate([
            'EVENT_NAME' => '<?php echo $smart_param_1; ?>',
            'LID' => ['s1'],
            'ACTIVE' => 'Y',
            'EMAIL_FROM' => '#DEFAULT_EMAIL_FROM#',
            'EMAIL_TO' => '',
            'BCC' => '',
            'SUBJECT' => '#SITE_NAME#: ',
            'BODY_TYPE' => 'text',
            'ADDITIONAL_FIELD' => [
                //массив дополнительных заголовков
                //вида ['NAME' => 'заголовок', 'VALUE' => 'значение']
            ],
            'MESSAGE' => "",
        ]);
    }

    /**
     * {@inheritdoc}
     *
     * Если при попытке удалить шаблон, будет найдено два или более шаблонов,
     * подходящих под условие, то будет выброшено исключение. Для решения этой
     * проблемы следует уточнить фильтр дополнительными параметрами.
     */
    public function down()
    {
        return $this->deleteEmailTemplate([
            'EVENT_NAME' => '<?php echo $smart_param_1; ?>',
        ]);
    }
}
