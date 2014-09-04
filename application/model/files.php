<?php

class Files {

    public function getFilesList ($path) {
        if (is_dir($path)) {
            $files = array();
            $dir = opendir($path);
                while (($readfile = readdir($dir)) !== false) {
                    if (!is_dir($readfile) && $readfile != '.' && $readfile != '..') {
                        $files[] = $readfile;
                    }
                }
            closedir($dir);
            Arrays::array_sort($files);
            return $files;
        }
    }

    public function getFilesListOrganized () {
        $files = $this->getFilesList(URL_POSTS);
        $files = Arrays::array_sort($files);
        $files_new = array();
        foreach ($files as $file) {
            if (preg_match('/(?<!\.draft)\.md/', $file)) {
                $filePart = str_replace ('.md', '', $file);
                $fileArr = explode ('_', $filePart);
                $files_new[$fileArr[1]] = array(
                    'date' => $fileArr[0],
                    'date-rss' => date(DATE_RSS, strtotime($fileArr[0])),
                    'alias' => $fileArr[1],
                    'file' => $file
                );
            }
        }
        return $files_new;
    }

    public function getFileContent ($entry) {
        $url = URL_POSTS . '/' . $entry['file'];
        $handle = fopen($url, 'r');
        $entry['title'] = fgets($handle);
        fgets($handle);
        $entry['content'] = fread($handle, filesize($url));
        $entry['content'] = $this->parse($entry['content']);
        fclose($handle);
        return $entry;
    }

    public function getFileFirstLine ($entry) {
        $url = URL_POSTS . '/' . $entry['file'];
        $handle = fopen($url, 'r');
            $entry['title'] = fgets($handle);
        fclose($handle);
        return $entry;
    }

    public function getFilesContents ($entries, $start, $length) {
        $entries = array_slice($entries, $start, $length);
        foreach ($entries as &$entry) {
            $entry = $this->getFileContent($entry);
            $entry['url'] = URL_SITE . '/' . $entry['alias'] . '/';
            $entry['url-full'] = URL_FULL . '/' . $entry['alias'] . '/';
        }
        return $entries;
    }

    public function getFilesFirstLine ($entries) {
        foreach ($entries as &$entry) {
            $entry = $this->getFileFirstLine($entry);
            $entry['url'] = URL_SITE . '/' . $entry['alias'] . '/';
            $entry['url-full'] = URL_FULL . '/' . $entry['alias'] . '/';
        }
        return $entries;
    }

    private function parse ($string) {
        $string = Parsedown::instance()->parse($string);
        $string = str_replace('src="', 'src="' . URL_SITE . '/' . URL_IMAGES . '/', $string);
        $string = preg_replace('/<a href="(?!http)(?:images\/)(.*?)">/', '<a href="' . URL_IMAGES  . '/$1">', $string);
        $string = preg_replace('/<a href="(?!http)(.*?)">/', '<a href="' . URL_SITE . '/$1">', $string);
        return $string;
    }

}

?>