
$(document).ready(function() {
    var memberCount = 1;

    // Function to add a new Question 9 input section
    function addQuestion9Fields(data) {
        var newQuestion9Fields = `
            <div class="hr-text">Member ${memberCount}</div>
            <div class="member mb-3">
                <div class="row row-cards">
                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Meron?</label>
                            <select class="form-select" name="question9[${memberCount}][if_yes]">
                                <option value="0">Select...</option>
                                <option value="1">Oo</option>
                                <option value="2">Wala</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Sino?</label>
                            <input type="text" name="question9[${memberCount}][answer1_q9]" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Saan?</label>
                            <input type="text" name="question9[${memberCount}][answer2_q9]" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Buwanang Kita/Naipapadala?</label>
                            <input type="text" name="question9[${memberCount}][answer3_q9]" class="form-control">
                        </div>
                    </div>

                    <div class="col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Uri ng Paninirahan sa ibang bansa (Immigrant / contract worker)</label>
                            <input type="text" name="question9[${memberCount}][answer4_q9]" class="form-control">
                        </div>
                    </div>
                </div>
            </div>
        `;

        $("#question9-section").append(newQuestion9Fields);
        memberCount++;

        if (data) {
            // Populate data if available
            $(`#question9-section input[name='question9[${memberCount}][answer1_q9]']`).val(data.answer1_q9);
            // Add similar lines for other fields as needed
        }
    }

    $("#add-member-button").click(function() {
        addQuestion9Fields();
        // Show the newly added input section
        $(`#question9-section .family-member:last`).show();
    });

    // Other code for storing/retrieving data from sessionStorage
});