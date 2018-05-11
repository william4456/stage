var renderer = new THREE.WebGLRenderer({ alpha: true });//alpha -> transparency
renderer.setSize( window.innerWidth-20, window.innerHeight-20 );
document.body.appendChild( renderer.domElement );

var scene	= new THREE.Scene();
var camera	= new THREE.PerspectiveCamera(45, window.innerWidth / window.innerHeight, 1, 1000 );
camera.position.z = 180;

THREEx.WindowResize(renderer, camera)

/////////////////////////////////////////
// LIGHTS
/////////////////////////////////////////
var ambientLight = new THREE.AmbientLight( 0xcccccc, 0.4 );
scene.add( ambientLight );
var pointLight = new THREE.PointLight( 0xffffff, 0.8 );
camera.add( pointLight );
scene.add( camera );

////////////////////////////////////////
// Controls
/////////////////////////////////////////
controls = new THREE.TrackballControls(camera);
controls.rotateSpeed = 2.0;
controls.zoomSpeed = 2.2;
controls.panSpeed = 0.8;
controls.noZoom = false;
controls.noPan = true;
controls.staticMoving = false;
controls.dynamicDampingFactor = 0.2;
controls.addEventListener( 'change', render );

/////////////////////////////////////////
// FILE .OBJ
//img <=512x512
/////////////////////////////////////////
var manager = new THREE.LoadingManager();
manager.onProgress = function ( item, loaded, total ) {
    console.log( item, loaded, total );
};

/////////////////////////////////////////
// MODEL
/////////////////////////////////////////
var onProgress = function ( xhr ) {
    if ( xhr.lengthComputable ) {
        var percentComplete = xhr.loaded / xhr.total * 100;
        console.log( Math.round(percentComplete, 2) + '% downloaded' );
    }
};

var onError = function ( err ) {
    console.error( 'An error happened.' );
};

var onLoad = function ( object ) {
    object.traverse( function ( texture ) {
        var material = new THREE.MeshBasicMaterial({map: texture});
    });
    object.position.y = - 75;
    object.position.x = 95;

    scene.add( object );
};

var loader = new THREE.OBJLoader( manager );
loader.load(pathObj, onLoad, onProgress, onError );

/////////////////////////////////////////
// Functions
/////////////////////////////////////////
function render() {
    camera.lookAt( scene.position );
}

;(function animate(){
    requestAnimationFrame( animate );
    controls.update();
    renderer.render( scene, camera );
})();

