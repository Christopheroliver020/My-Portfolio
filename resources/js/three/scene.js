import * as THREE from 'three';

const canvas = document.querySelector('#three-canvas');

if (!canvas) {
    console.warn('Three.js canvas not found.');
} else {

    const scene = new THREE.Scene();

    const camera = new THREE.PerspectiveCamera(
        60,
        window.innerWidth / window.innerHeight,
        0.1,
        100
    );

    camera.position.z = 5;


    const renderer =
        new THREE.WebGLRenderer({
            canvas: canvas,
            antialias: true,
            alpha: true,
        });


    renderer.setPixelRatio(
        Math.min(
            window.devicePixelRatio,
            2
        )
    );


    renderer.setSize(
        window.innerWidth,
        window.innerHeight
    );


    /*
    |--------------------------------------------------------------------------
    | Object
    |--------------------------------------------------------------------------
    */

    const geometry =
        new THREE.IcosahedronGeometry(
            1.4,
            2
        );


    const material =
        new THREE.MeshBasicMaterial({
            color: 0xffffff,
            wireframe: true,
            transparent: true,
            opacity: 0.45,
        });


    const object =
        new THREE.Mesh(
            geometry,
            material
        );


    scene.add(object);


    /*
    |--------------------------------------------------------------------------
    | Animation
    |--------------------------------------------------------------------------
    */

    function animate() {

        requestAnimationFrame(
            animate
        );


        object.rotation.x += 0.0015;

        object.rotation.y += 0.002;


        renderer.render(
            scene,
            camera
        );
    }


    animate();


    /*
    |--------------------------------------------------------------------------
    | Resize
    |--------------------------------------------------------------------------
    */

    window.addEventListener(
        'resize',
        () => {

            camera.aspect =
                window.innerWidth /
                window.innerHeight;

            camera.updateProjectionMatrix();


            renderer.setSize(
                window.innerWidth,
                window.innerHeight
            );

        }
    );

}
