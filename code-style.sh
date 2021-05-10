#!/bin/bash

# Services;
$(pwd)/vendor/bin/phpcs  --standard=PSR12 $(pwd)/app/Services/
$(pwd)/vendor/bin/phpcbf --standard=PSR12 $(pwd)/app/Services/

# Models;
$(pwd)/vendor/bin/phpcs  --standard=PSR12 $(pwd)/app/*.php
$(pwd)/vendor/bin/phpcbf --standard=PSR12 $(pwd)/app/*.php

# Controllers;
$(pwd)/vendor/bin/phpcs  --standard=PSR12 $(pwd)/app/Controllers/
$(pwd)/vendor/bin/phpcbf --standard=PSR12 $(pwd)/app/Controllers/

# Requests;
$(pwd)/vendor/bin/phpcs  --standard=PSR12 $(pwd)/app/Resquests/
$(pwd)/vendor/bin/phpcbf --standard=PSR12 $(pwd)/app/Resquests/

# Observers;
$(pwd)/vendor/bin/phpcs  --standard=PSR12 $(pwd)/app/Observers/
$(pwd)/vendor/bin/phpcbf --standard=PSR12 $(pwd)/app/Observers/

# Migrations;
$(pwd)/vendor/bin/phpcs  --standard=PSR12 $(pwd)/database/migrations/
$(pwd)/vendor/bin/phpcbf --standard=PSR12 $(pwd)/database/migrations/

# Seeds;
$(pwd)/vendor/bin/phpcs  --standard=PSR12 $(pwd)/database/seeds/
$(pwd)/vendor/bin/phpcbf --standard=PSR12 $(pwd)/database/seeds/

# Routes:
$(pwd)/vendor/bin/phpcs  --standard=PSR12 $(pwd)/routes/
$(pwd)/vendor/bin/phpcbf --standard=PSR12 $(pwd)/routes/

# Testes:
$(pwd)/vendor/bin/phpcs  --standard=PSR12 $(pwd)/tests/
$(pwd)/vendor/bin/phpcbf --standard=PSR12 $(pwd)/tests/

#docker run -it --rm -v $(pwd):/project -w /project jakzal/phpqa phpmd app text cleancode,codesize,controversial,design,naming,unusedcode