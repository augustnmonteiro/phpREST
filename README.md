# phpREST

My old phpREST framework :)

# Creating a TODO APP
1. Create your table
```sql
CREATE SCHEMA IF NOT EXISTS `todo` DEFAULT CHARACTER SET utf8 ;
USE `todo` ;

CREATE TABLE IF NOT EXISTS `todo`.`todo` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `description` LONGTEXT NULL DEFAULT NULL,
  `status` INT(1) NULL DEFAULT '0',
  PRIMARY KEY (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 8
DEFAULT CHARACTER SET = utf8;
```
2. Edit config.php
3. Run `php -S localhost:3000`
4. Now you can use the REST API
5. GET /todo will list all TODOS in your database
6. POST /todo will create a new TODO
7. PUT /todo/index/:id will update your TODO
8. DELETE /todo/index/:id will delete your TODO
9. Be Happy!, Be Curious!

:warning: REMEMBER in POST and PUT the body need be a JSON

## License

    Copyright 2015 Augusto Monteiro

    Licensed under the Apache License, Version 2.0 (the "License");
    you may not use this file except in compliance with the License.
    You may obtain a copy of the License at

        http://www.apache.org/licenses/LICENSE-2.0

    Unless required by applicable law or agreed to in writing, software
    distributed under the License is distributed on an "AS IS" BASIS,
    WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
    See the License for the specific language governing permissions and
    limitations under the License.
