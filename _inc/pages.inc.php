<?php
class Pages {
    public function getPage($id) {
        global $db;

        $page = $db->prepare("SELECT * FROM pages WHERE id = ? OR url = ?");
        $page->bind_param("ss", $id, $id);
        $page->execute();
        $page = $page->get_result();
        $page = $page->fetch_assoc();
        return $page;
    }

    public function getPages() {
        global $db;
        $pages = $db->query("SELECT * FROM pages");
        $pageList = array();
        while ($row = $pages->fetch_assoc()) {
            $pageList[] = $row;
        }
        return $pageList;
    }

    public function setTitle($title) {
        echo "<script>document.title = 'Domain - {$title}'</script>";
    }
}