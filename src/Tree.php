<?php

namespace App;

class Tree
{
    public const
        ID          = 'id',
        NAME        = 'name',
        CHILDREN    = 'children',
        CATEGORY    = 'category_id',
        TRANSLATION = 'translations',
        DEFAULT_DIR = 'result.json';

    /**
     * @param array $roots
     * @param array $list
     * @return void
     */
    public static function treeLRV(array &$roots, array $list): void
    {
        foreach ($roots as &$root) {
            if (!empty($root['children'])) {
                self::treeLRV($root['children'], $list);
            }
            if (array_key_exists($root[self::ID], $list)) {
                $root['name'] = $list[$root[self::ID]];
            }
        }
    }

    /**
     * @param array $list
     * @return array
     */
    public static function prepareNames(array $list): array
    {
        $arr = [];
        foreach ($list as $item) {
            $arr[$item[self::CATEGORY]] = self::getNameAsString($item['translations']);

        }
        return $arr;
    }

    public static function printAndSave(array $tree, string $toFile = self::DEFAULT_DIR, bool $saveAsJson = true): void
    {
        print_r($tree);
        file_put_contents($toFile, $saveAsJson ? json_encode($tree) : $tree);
    }

    /**
     * @param array $details
     * @return string
     */
    private static function getNameAsString(array $details): string
    {
        $arr = [];
        foreach ($details as $detail) {
            $arr[] = $detail[self::NAME];
        }
        return implode(',', $arr);
    }
}
