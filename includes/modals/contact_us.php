<div class="modal" tabindex="-1" id="form1-4">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Contact Us</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form class="mbr-form" id="contactus" action="/actions/v1/contactus.php" method="POST" data-form-title="Contact Us Form" enctype="application/json">
                    <div class="row row-sm-offset">
                        <div class="col-md-4 multi-horizontal" data-for="name">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7" for="name-form1-4">Name</label>
                                <input type="text" class="form-control" name="name" data-form-field="Name" required="" id="name-form1-4">
                            </div>
                        </div>
                        <div class="col-md-4 multi-horizontal" data-for="email">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7" for="email-form1-4">Email</label>
                                <input type="email" class="form-control" name="email" data-form-field="Email" required="" id="email-form1-4">
                            </div>
                        </div>
                        <div class="col-md-4 multi-horizontal" data-for="phone">
                            <div class="form-group">
                                <label class="form-control-label mbr-fonts-style display-7" for="phone-form1-4">Phone</label>
                                <input type="tel" class="form-control" name="phone" data-form-field="Phone" id="phone-form1-4">
                            </div>
                        </div>
                    </div>
                    <div class="form-group" data-for="message">
                        <label class="form-control-label mbr-fonts-style display-7" for="message-form1-4">Message</label>
                        <textarea type="text" class="form-control" name="message" rows="7" data-form-field="Message" id="message-form1-4"></textarea>
                    </div>

                    <span class="input-group-btn"><button type="submit" id="contactus_submit" class="btn btn-form btn-black-outline display-4 w-100">Send Information</button></span>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('form#contactus').on('submit', _ => {
        _.preventDefault()
        $('#contactus_submit').attr('disabled', true)
        let form = $('form#contactus')
        let data = {
            'name': form.find('input[name="name"]').val(),
            'email': form.find('input[name="email"]').val(),
            'phone': form.find('input[name="phone"]').val(),
            'message': form.find('textarea[name="message"]').val()
        }

        $.ajax(form.attr('action'), {
            data: data,
            method: 'POST',
            // contentType: 'application/json',
            success: (resp) => {
                let res = JSON.parse(resp)
                console.log(res)
                if (res.status == 0) {
                    $('#contactus_submit').get(0).removeAttribute('disabled')
                    let html = '<div class="position-fixed top-0 end-0 p-3" style="z-index: 11000">'
                    html += '<div class="toast alert-danger show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000"><div class="toast-header"><strong class="me-auto">Status</strong>'
                    html += '<small>now</small>'
                    html += '<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>'
                    html += '</div><div class="toast-body">'
                    html += res.error
                    html += '</div></div></div>'
                    let a = document.createElement('div')
                    a.innerHTML = html
                    document.body.appendChild(a)
                } else {
                    $('#form1-4 .btn-close').click()
                    $('#contactus_submit').get(0).removeAttribute('disabled')
                    let html = '<div class="position-fixed top-0 end-0 p-3" style="z-index: 11000">'
                    html += '<div class="toast alert-success show" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="5000"><div class="toast-header"><strong class="me-auto">Status</strong>'
                    html += '<small>now</small>'
                    html += '<button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>'
                    html += '</div><div class="toast-body">'
                    html += res.response
                    html += '</div></div></div>'
                    let a = document.createElement('div')
                    a.innerHTML = html
                    document.body.appendChild(a)
                }
            },
            error: (err) => {
                $('#form1-4.btn-close').click()
                console.error(err)
            }
        })
    })
</script>
