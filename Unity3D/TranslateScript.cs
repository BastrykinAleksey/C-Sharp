using UnityEngine;
using System.Collections;

public class TranslateScript : MonoBehaviour {
    public float distancePerSecond;
    
    void Update() {
        transform.Translate(0, 0, distancePerSecond * Time.deltaTime); // distancePerSecond 
        //transform.Translate(0, 0, distancePerFrame); // distancePerFrame
    }
}