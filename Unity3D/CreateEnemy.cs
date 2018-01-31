using UnityEngine;
using System.Collections;

public class CreateEnemy : MonoBehaviour {
 public GameOgject enemy;
 public int enemyCount;
    void Start() {
     for (int  i =5;i <= enemyCount; i++){
     	Instantiate(enemy)
     }
    }
}