document.addEventListener('DOMContentLoaded', () => {

    const typeInput = document.getElementById('type');

    const typeButtons = document.querySelectorAll('.type-option');

    const mediaField = document.getElementById('mediaField');

    const thumbnailField =
        document.getElementById('thumbnailField');

    const mediaInput =
        document.getElementById('media');

    const thumbnailInput =
        document.getElementById('thumbnail');

    const mediaPreview =
        document.getElementById('mediaPreview');


    /*
    |--------------------------------------------------------------------------
    | POST TYPE
    |--------------------------------------------------------------------------
    */

    function updatePostType(type) {

        if (!typeInput) return;

        typeInput.value = type;


        /*
        | Remove active state
        */

        typeButtons.forEach(button => {

            button.classList.toggle(
                'active',
                button.dataset.type === type
            );

        });


        /*
        | TEXT
        */

        if (type === 'text') {

            if (mediaField) {
                mediaField.style.display = 'none';
            }

            if (thumbnailField) {
                thumbnailField.style.display = 'none';
            }

            clearMedia();

            return;
        }


        /*
        | IMAGE
        */

        if (type === 'image') {

            if (mediaField) {
                mediaField.style.display = 'block';
            }

            if (thumbnailField) {
                thumbnailField.style.display = 'none';
            }

            if (mediaInput) {
                mediaInput.accept =
                    'image/jpeg,image/png,image/webp';
            }

            if (thumbnailInput) {
                thumbnailInput.value = '';
            }

            return;
        }


        /*
        | VIDEO
        */

        if (type === 'video') {

            if (mediaField) {
                mediaField.style.display = 'block';
            }

            if (thumbnailField) {
                thumbnailField.style.display = 'block';
            }

            if (mediaInput) {
                mediaInput.accept =
                    'video/mp4,video/webm';
            }

        }

    }


    /*
    |--------------------------------------------------------------------------
    | TYPE BUTTONS
    |--------------------------------------------------------------------------
    */

    typeButtons.forEach(button => {

        button.addEventListener('click', () => {

            const type =
                button.dataset.type;

            updatePostType(type);

        });

    });


    /*
    |--------------------------------------------------------------------------
    | MEDIA PREVIEW
    |--------------------------------------------------------------------------
    */

    if (mediaInput) {

        mediaInput.addEventListener('change', function () {

            const file = this.files[0];

            if (!file || !mediaPreview) {
                return;
            }


            mediaPreview.innerHTML = '';

            mediaPreview.style.display = 'block';


            /*
            | IMAGE
            */

            if (file.type.startsWith('image/')) {

                const image =
                    document.createElement('img');

                image.src =
                    URL.createObjectURL(file);

                image.alt =
                    'Selected image preview';

                mediaPreview.appendChild(image);

                return;
            }


            /*
            | VIDEO
            */

            if (file.type.startsWith('video/')) {

                const video =
                    document.createElement('video');

                video.src =
                    URL.createObjectURL(file);

                video.controls = true;

                video.preload = 'metadata';

                mediaPreview.appendChild(video);

            }

        });

    }


    /*
    |--------------------------------------------------------------------------
    | CLEAR MEDIA
    |--------------------------------------------------------------------------
    */

    function clearMedia() {

        if (mediaInput) {
            mediaInput.value = '';
        }

        if (thumbnailInput) {
            thumbnailInput.value = '';
        }

        if (mediaPreview) {

            mediaPreview.innerHTML = '';

            mediaPreview.style.display = 'none';

        }

    }


    /*
    |--------------------------------------------------------------------------
    | INITIAL TYPE
    |--------------------------------------------------------------------------
    */

    if (typeInput) {

        updatePostType(
            typeInput.value || 'text'
        );

    }

});
