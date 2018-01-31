using UnityEngine;
using System.Collections;

public class CreateEnemy : MonoBehaviour {
 public string enemyBoolet;
 public int  enemyDamage;
 public gameObject player;
    void OnCollisionEnter(Collision otherObj) {
    if (otherObj.gameObject.tag == enemyTag) {
        if (player.life-enemyDamage)<=0{
        	Destroy(gameObject,.5f);
        }
        
    }
}
}