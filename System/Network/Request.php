<?php
/**
 * Класс, представляющий запрос пользователя
 * 
 * Всем, кто читает данное пособие -- M. Zandstra - PHP Object, Patterns and Practice [p. 242]:
 *    "The Request object is _ALSO_ a useful repository for data that needs to be communicated to the view 
 *     layer. In that respect, Request can also provide response capabilities."
 * 
 *    "Объект Request ТАКЖЕ имеет дополнительное хранилище для данных, которые будут переданы в слой представления [...]"
 * 
 * _Данный_ класс НЕ предоставляет удобного местечка для хранения данных (см. определение слова _request_), которые будут переданы в
 * представление, так как это НЕ учебная демонстрация шаблонов.
 * 
 * Данный класс -- только для удобного доступа к тому, _ЧТО_ пользователь (браузер/cli/...) запрашивает и _КАК_ запрашивает
 *
 * @see http://en.wikipedia.org/wiki/Hypertext_Transfer_Protocol		
 * @author nekjine
*/
namespace System\Network;

class Request {

}