<?php

require_once ('vendor/autoload.php');

use App\Tree;

$tree = json_decode(file_get_contents('tree.json'), true);
$list = json_decode(file_get_contents('list.json'), true);

Tree::treeLRV($tree, Tree::prepareNames($list));
Tree::printAndSave($tree);
