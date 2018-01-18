using UnityEngine;

public class WaypointManager : MonoBehaviour {
    public Transform[] waypoints;
    
    void Start() {
        waypoints = new Transform[transform.childCount];
        int i = 0;
        
        foreach (Transform t in transform) {
            waypoints[i++] = t;
        }
    }
}
