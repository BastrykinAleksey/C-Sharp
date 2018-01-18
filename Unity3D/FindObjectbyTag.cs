using UnityEngine;

public class WaypointManager : MonoBehaviour {
    public string player_tag;
    public string enemy_tag;    
    public string player_name;
    public string enemy_name;    
   
     GameObject player;
     GameObject[] enemy;
    
    void Start() {
   
    if(player = GameObject.Find(player_name) == nil{
     player = GameObject.FindWidthTag(player_tag);	
    }
    if (enemy  = GameObject.Find(enemy_name)){
     enemy  = GameObject.FindGameObjectsWithTag(enemy_tag);	
    }
    }
}
