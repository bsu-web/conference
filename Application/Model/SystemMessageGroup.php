<?php

namespace Application\Model;

/**
 * Группа системных сообщений
 * @author Zalutskii
 * @version 14.11.13
 */

class SystemlMessageGroup extends \Application\Model\MessageGroup {

    public function targetClass() {
        return 'SystemlMessageGroup';
    }
}

?>