<?php
use Cake\Core\Configure;
Configure::write('Stats.auth_class','PltAuth');
Configure::write('Stats.exclude_prefixes',['rest']);