var container, stats, canvas, context, baseImage, texture, headTrackerCanvas, video, videoWidth, videoHeight, offsetLeft, offsetTop, maxRatio;
var camera, scene, renderer, particles, geometry, materials = [], parameters, i, h, color, projector;
var mouseX = 0, mouseY = 0;

var useVideoCanvas = false;

var windowHalfX = window.innerWidth / 2;
var windowHalfY = window.innerHeight / 2;

var particleCount = 50000;
loadImage();

// Bind UI Events

var modal = document.querySelector( '.info' );

var openModal = document.querySelector( '.open-info' );

// Show modal on click
openModal.onclick = function() {
    modal.className = "info text";
}

function loadImage() {
    baseImage = new Image;
    baseImage.src = "images/screen-test.png";
    baseImage.onload = function(){

        prepareCanvas();
        init();
        animate();
    };
}

function prepareCanvas() {

    canvas = document.createElement( 'canvas' );
    var headtracanvas = document.createElement( 'canvas' );
    context = canvas.getContext( '2d' );
    video = document.querySelector( 'video' );

    canvas.width = window.innerWidth;
    canvas.height = window.innerHeight;
    context.drawImage( baseImage, 0, 0, canvas.width, canvas.height );

    headTrackerCanvas = document.createElement( 'canvas' );

    // document.body.appendChild( headTrackerCanvas );
    // document.body.appendChild( canvas );

    navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;

    var videoSelector = { video: true };

    if ( !navigator.getUserMedia ) {

        var getStartedElement = document.querySelector( '.get-started' );
        getStartedElement.className = "get-started error";
        getStartedElement.innerHTML = "Oh no! Your browser doesn't support WebRTC, perhaps try chrome ;)"
        return;
    }

    // Try to launch webcam.
    navigator.getUserMedia( videoSelector, function( stream ) {

        // Remove mouse events (and use face tracking)
        document.removeEventListener( 'mousemove', onDocumentMouseMove, false );
        document.removeEventListener( 'touchstart', onDocumentTouchStart, false );
        document.removeEventListener( 'touchmove', onDocumentTouchMove, false );


        window.URL = window.URL || window.webkitURL || window.msURL || window.mozURL;

        // Opera Shim
        if (window.opera) {
            window.URL = window.URL || {};
            if (!window.URL.createObjectURL) window.URL.createObjectURL = function(obj) {return obj;};
        }

        // Load Stream Into Video
        if (video.mozCaptureStream) {
            video.mozSrcObject = stream;
        } else {
            video.src = (window.URL && window.URL.createObjectURL(stream)) || stream;
        }

        var launchVideoRendering = function() {
            videoWidth = video.videoWidth;
            videoHeight = video.videoHeight;

            headTrackerCanvas.width = videoWidth / 2;
            headTrackerCanvas.height = videoHeight / 2;

            var videoRatio = canvas.width / videoWidth;
            var screenRatio = canvas.height / videoHeight;
            maxRatio = Math.max( videoRatio, screenRatio );

            offsetTop = -((videoHeight * maxRatio) - canvas.height) / 2;
            offsetLeft = -((videoWidth * maxRatio) - canvas.width) / 2;
            useVideoCanvas = true;

            document.addEventListener('facetrackingEvent',
                function (event) {
                    mouseX = (event.x / headTrackerCanvas.width) * canvas.width - windowHalfX;
                }
            );
        };

        var debounceVideoRendering = function() {
            setTimeout( launchVideoRendering, 1000 );
            video.removeEventListener('playing', debounceVideoRendering, false);
        }

        video.addEventListener('playing', debounceVideoRendering, false);

        modal.className = "info text hidden";

        // Start Head tracking
        var htracker = new headtrackr.Tracker( {ui : false, headPosition: false, detectionInterval: 40});
        htracker.init(video, headTrackerCanvas);
        htracker.start();
    }, function() {

        console.log( "no webgl!" );

    });
}

function init() {

    container = document.createElement( 'div' );
    document.body.appendChild( container );

    camera = new THREE.PerspectiveCamera( 75, window.innerWidth / window.innerHeight, 1, 3000 );
    camera.position.z = 1600;

    scene = new THREE.Scene();
    geometry = new THREE.Geometry();

    attributes = {

        size: {	type: 'f', value: [] },
        customColor: { type: 'c', value: [] }
    };

    texture = new THREE.Texture( canvas );
    texture.needsUpdate = true;

    uniforms = {

        width: {	type: 'f', value: window.innerWidth * window.devicePixelRatio },
        height: {	type: 'f', value: window.innerHeight * window.devicePixelRatio },
        amplitude: { type: "f", value: 1.0 },
        color:     { type: "c", value: new THREE.Color( 0xffffff ) },
        texture:   { type: "t", value: texture },
    };

    for ( i = 0; i < particleCount; i ++ ) {

        var vertex = new THREE.Vector3();
        vertex.x = Math.random() * 3000 - 1500;
        vertex.y = Math.random() * 3000 - 1500;
        vertex.z = Math.random() * 3000 - 1500;

        geometry.vertices.push( vertex );
    }

    parameters = [
        [ [1, 1, 0.5], 5 ],
        [ [0.95, 1, 0.5], 4 ],
        [ [0.90, 1, 0.5], 3 ],
        [ [0.85, 1, 0.5], 2 ],
        [ [0.80, 1, 0.5], 1 ]
    ];

    for ( i = 0; i < parameters.length; i ++ ) {

        color = parameters[i][0];
        size  = parameters[i][1];

        materials[i] = new THREE.ShaderMaterial( {

            uniforms: 		uniforms,
            attributes:     attributes,
            vertexShader:   document.getElementById( 'vertexshader' ).textContent,
            fragmentShader: document.getElementById( 'fragmentshader' ).textContent,
            blending: 		THREE.NormalBlending,
            depthTest: 		true,
            transparent:	true,
            size: size
        });


        particles = new THREE.ParticleSystem( geometry, materials[i] );

        particles.dynamic = true;

        particles.rotation.x = Math.random() * 6;
        particles.rotation.y = Math.random() * 6;
        particles.rotation.z = Math.random() * 6;

        scene.add( particles );

        var vertices = particles.geometry.vertices;
        var values_size = attributes.size.value;
        var values_color = attributes.customColor.value;

        for( var v = 0; v < vertices.length; v++ ) {
            values_size[ v ] = 70 + Math.random() * 50;
        }
    }

    renderer = new THREE.WebGLRenderer();
    renderer.setSize( window.innerWidth, window.innerHeight );
    container.appendChild( renderer.domElement );

    container.onclick = function() {
        modal.className = "info text hidden";
    }

    document.addEventListener( 'mousemove', onDocumentMouseMove, false );
    document.addEventListener( 'touchstart', onDocumentTouchStart, false );
    document.addEventListener( 'touchmove', onDocumentTouchMove, false );
    window.addEventListener( 'resize', onWindowResize, false );
}

function onWindowResize() {

    windowHalfX = window.innerWidth / 2;
    windowHalfY = window.innerHeight / 2;

    camera.aspect = window.innerWidth / window.innerHeight;
    camera.updateProjectionMatrix();

    renderer.setSize( window.innerWidth, window.innerHeight );
}

function onDocumentMouseMove( event ) {

    mouseX = event.clientX - windowHalfX;
    mouseY = event.clientY - windowHalfY;
}

function onDocumentTouchStart( event ) {

    if ( event.touches.length === 1 ) {

        event.preventDefault();

        mouseX = event.touches[ 0 ].pageX - windowHalfX;
        mouseY = event.touches[ 0 ].pageY - windowHalfY;
    }
}

function onDocumentTouchMove( event ) {

    if ( event.touches.length === 1 ) {

        event.preventDefault();

        mouseX = event.touches[ 0 ].pageX - windowHalfX;
        mouseY = event.touches[ 0 ].pageY - windowHalfY;
    }
}


function animate() {

    requestAnimationFrame( animate );
    render();
}

function render() {

    if ( useVideoCanvas ) {
        context.drawImage(video, offsetLeft, offsetTop, videoWidth * maxRatio, videoHeight * maxRatio);
    }

    var time = Date.now() * 0.00005;
    texture.needsUpdate = true;

    camera.position.x += ( mouseX - camera.position.x ) * 0.05;
    camera.position.y += ( - mouseY - camera.position.y ) * 0.05;
    camera.lookAt( scene.position );

    for ( i = 0; i < scene.children.length; i ++ ) {

        var object = scene.children[ i ];

        if ( object instanceof THREE.ParticleSystem ) {

            object.rotation.x = time * ( i < 5 ? i + 1 : - ( i + 1 ) ) * -0.8;
        }
    }

    renderer.render( scene, camera );
}