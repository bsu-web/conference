<?php

namespace Application\Model;

class PersonalMessageGroup extends \Application\Model\MessageGroup {

    /**
     * Информация о последнем посещении пользователя группы
     * @var \Application\Model\Visit
     */
    private $visit;

    /**
     * Задать объект-информацию о времени посещения группы
     * @param \Application\Model\Visit $visit 
     */
    public function setVisit(\Application\Model\Visit $visit) {
        $this->visit = $visit;
        $this->markDirty();
    }

    /**
     * Получить объект-информацию о времени посещения группы
     * @return \Application\Model\Visit
     */
    public function getVisit() {
        return $this->visit;
    }

    public function targetClass() {
        return 'PersonalMessageGroup';
    }
}

?>