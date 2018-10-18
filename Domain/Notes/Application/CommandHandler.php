<?php
/**
 * Created by PhpStorm.
 * User: jorgegonzalez
 * Date: 18/10/18
 * Time: 16:39
 */

namespace Domain\Notes\Application;


interface CommandHandler
{
    public function __invoke(CreateNoteCommand $command);


}