<?php
    // src/Model/Entity/Article.php
    namespace App\Model\Entity;

    use Cake\Collection\Collection; // to import the Collection class
    use Cake\ORM\Entity;

    class Article extends Entity {
        protected $_accessible = [
            '*' => true,
            'id' => false,
            'slug' => false,
            'tag_string' => true // Updated to contain `tag_string`
        ];

        protected function _getTagString() {
            if (isset($this->_fields['tag_string'])) {
                return $this->_fields['tag_string'];
            }
            if (empty($this->tags)) {
                return '';
            }
            $tags = new Collection($this->tags);
            $str = $tags->reduce(function ($string, $tag) {
                return $string . $tag->title . ', ';
            }, '');
            return trim($str, ', ');
        }
    }
?>
