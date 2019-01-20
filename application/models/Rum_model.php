<?php 

class Rum_model extends CI_Model
{
    public function getAllTable($table_name)
    {
        return $this->db->get($table_name);
    }

    public function getTotalKmeans()
    {
        return $this->db->count_all('k_means');
    }
    public function arrKmeans()
    {
        // $query = "SELECT n1, n2 FROM (SELECT id_detail_kmeans AS idk, nilai AS n1 FROM detail_kmeans WHERE id_detail_kmeans %2 <> 0) AS nilai1 JOIN (SELECT (id_detail_kmeans-1) AS idGanjil, nilai AS n2 FROM detail_kmeans WHERE id_detail_kmeans %2 = 0) AS nilai2 ON nilai1.idk = nilai2.idGanjil";
        
        return $this->db->query($query);
    }
}