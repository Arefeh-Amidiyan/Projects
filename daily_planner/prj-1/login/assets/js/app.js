$('.summernote').summernote({
    height: 400,
    tabsize: 2
});

$('#datatable_products').DataTable({
    responsive: true
});

$('#datatable_brands').DataTable({
    responsive: true
});

$('div#upload_photo_products').dropzone({
    url: "/requests/PhotoProductRequest.php",
    paramName: "photo_product",
    maxFiles: 5,
    maxFilesize: 1, // MB
    addRemoveLinks: true,
    acceptedFiles: "image/*",
    params: {
        product_id: $('#input_product_id').val()
    },
    accept: function(file, done) {
        done();
    },
    error: function (file, resp) {
        let response = JSON.parse(resp);
        if (file.previewElement) {
            file.previewElement.classList.add("dz-error");
            if (typeof response !== "string" && response.message) {
                response = response.message;
            }
            for (let node of file.previewElement.querySelectorAll(
                "[data-dz-errormessage]"
            )) {
                node.textContent = response;
            }
        }
    },
});

$('#upload_photo_banners2').dropzone({
    url: "/requests/PhotoBannerRequest.php",
    paramName: "photo_banner",
    maxFiles: 5,
    maxFilesize: 1, // MB
    addRemoveLinks: true,
    acceptedFiles: "image/*",
    params: {
        banner_id: $('#input_banner_id').val()
    },
    accept: function(file, done) {
        done();
    },
    error: function (file, res) {
        let response;
        try {
            response = JSON.parse(res);
        } catch (e) {
            response = res;
        }
        if (file.previewElement) {
            file.previewElement.classList.add("dz-error");
            if (typeof response !== "string" && response.error) {
                response = message.error;
            } else if (typeof response !== "string" && response.message) {
                response = response.message;
            }
            for (let node of file.previewElement.querySelectorAll(
                "[data-dz-errormessage]"
            )) {
                node.textContent = response;
            }
        }
    },
});
