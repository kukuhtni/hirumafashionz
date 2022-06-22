<?php
class M_star_rating extends CI_Model
{
 function get_business_data()
 {
  $this->db->order_by('id', 'DESC');
  return $this->db->get('business');
 }

 function get_business_rating($business_id)
 {
  $this->db->select('AVG(rating) as rating');
  $this->db->from('rating');
  $this->db->where('business_id', $business_id);
  $data = $this->db->get();
  foreach($data->result_array() as $row)
  {
   return $row["rating"];
  }
 }

 function html_output()
 {
  $data = $this->get_business_data();
  $output = '';
  foreach($data->result_array() as $row)
  {
   $color = '';
   $rating = $this->get_business_rating($row["id"]);
   $output .= '
   <h3 class="text-primary">'.$row["business_name"].'</h3>
   <ul class="list-inline" data-rating="'.$rating.'" title="Average Rating - '.$rating.'">
   ';
   for($count = 1; $count <= 5; $count++)
   {
    if($count <= $rating)
    {
     $color = 'color:#ffcc00;';
    }
    else
    {
     $color = 'color:#ccc;';
    }

    $output .= '<li title="'.$count.'" id="'.$row['id'].'-'.$count.'" data-index="'.$count.'" data-business_id="'.$row["id"].'" data-rating="'.$rating.'" class="rating" style="cursor:pointer; '.$color.' font-size:24px;">&#9733;</li>';
   }
   $output .= '</ul>
   <p>'.$row["address"].'</p>
   <label style="text-danger">'.$row["product"].'</label>
   <hr />
   ';
  }
  echo $output;
 }

 function insert_rating($data)
 {
  $this->db->insert('rating', $data);
 }
}
