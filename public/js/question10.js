
$(document).ready(function() {
    var count = 1;

    // Function to add a new Question 9 input section
    function addQuestion10Fields(data) {
        var newQuestion10Fields = `
            <div class="hr-text">${count}</div>
            <div class="question10 mb-3">
                <div class="row row-cards mb-1">
                    <div class="col-sm-12 col-md-12">
                        <select class="form-select" name="question10[${count}][answer1_q10]">
                            <option value="">Select...</option>
                            <option value="1">Pampublikong Paaralan</option>
                            <option value="2">Pampribadong Paaralan</option>
                        </select>
                    </div>
                </div>
                <div class="row row-cards">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Ilan?</label>
                            <input type="text" name="question10[${count}][answer2_q10]" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row row-cards mb-1">
                    <div class="col-sm-12 col-md-12">
                        <select class="form-select" name="question10[${count}][answer3_q10]">
                            <option value="">Select...</option>
                            <option value="1">Elementarya</option>
                            <option value="2">Senior High</option>
                            <option value="3">Kolehiyo</option>
                        </select>
                    </div>
                </div>
                <div class="row row-cards">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Pangalan ng Paaralan</label>
                            <input type="text" name="question10[${count}][answer4_q10]" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        `;

        $("#question10-section").append(newQuestion10Fields);
        count++;

        // if (data) {
        //     // Populate data if available
        //     $(`#question9-section input[name='question9[${memberCount}][answer1_q9]']`).val(data.answer1_q9);
        //     // Add similar lines for other fields as needed
        // }
    }

    $("#question10-button").click(function() {
        addQuestion10Fields();
        // Show the newly added input section
        $(`#question10-section .family-member:last`).show();
    });

    // Other code for storing/retrieving data from sessionStorage
});