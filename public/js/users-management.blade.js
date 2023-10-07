$(document).ready(function () {
    // Initial load of users (page 1)
    loadUsers(1);

    // Handle pagination link clicks
    $("#pagination-container").on("click", "a.page-link", function (e) {
        e.preventDefault();
        var page = $(this).data("page");
        loadUsers(page); // Load users for the clicked page
    });

    function loadUsers(page = 1) {
        $.ajax({
            url: `/user-management?page=${page}`,
            type: "GET",
            dataType: "json",
            success: function (data) {
                renderUsers(data.users.data);
                renderPagination(data.users.current_page, data.users.last_page);
            },
            error: function (xhr, status, error) {
                console.error(xhr.responseText);
            },
        });
    }

    function renderUsers(users) {
        var userContainer = $("#user-container");
        userContainer.empty();

        users.forEach(function (user) {
            var onlineStatusBadge = user.online_status ? '<span class="badge bg-green ms-auto"></span>' : '<span class="badge bg-red ms-auto"></span>';
            var userNameInitial = user.name ? user.name.charAt(0).toUpperCase() : '';

            var userCard = `
                <div class="col-md-6 col-lg-3">
                    <div class="card">
                        <div class="card-header">
                            <div class="card-title">
                                ${onlineStatusBadge}
                            </div>
                            <!-- ... (Other card header content) ... -->
                        </div>
                        <div class="card-body p-4 text-center">
                            <span class="avatar avatar-xl mb-3 rounded" style="background-image: url(${user.avatar})">
                                ${userNameInitial}
                            </span>
                            <h3 class="m-0 mb-1">
                                <a href="#">${user.name}</a>
                            </h3>
                            <div class="text-muted">${user.barangay}</div>
                            <div class="mt-3">
                                <span class="badge ${user.role === 0 ? 'bg-purple-lt' : 'bg-green-lt'}">
                                    ${user.role === 0 ? 'Admin' : 'Sub-admin'}
                                </span>
                            </div>
                        </div>
                        <!-- ... (Other card content) ... -->
                    </div>
                </div>
            `;

            userContainer.append(userCard);
        });
    }

    function renderPagination(currentPage, lastPage) {
        var paginationContainer = $("#pagination-container");
        paginationContainer.html(generatePaginationHtml(currentPage, lastPage));
    }

    function generatePaginationHtml(currentPage, lastPage) {
        var paginationHtml = '<ul class="pagination">';
    
        // Previous Page Link
        if (currentPage > 1) {
            paginationHtml += '<li class="page-item">';
            paginationHtml += '<a class="page-link" href="#" data-page="' + (currentPage - 1) + '">&lt;</a>';
            paginationHtml += '</li>';
        }
    
        // Pagination Elements
        for (var i = 1; i <= lastPage; i++) {
            paginationHtml += '<li class="page-item ' + (i === currentPage ? 'active' : '') + '">';
            paginationHtml += '<a class="page-link" href="#" data-page="' + i + '">' + i + '</a>';
            paginationHtml += '</li>';
        }
    
        // Next Page Link
        if (currentPage < lastPage) {
            paginationHtml += '<li class="page-item">';
            paginationHtml += '<a class="page-link" href="#" data-page="' + (currentPage + 1) + '">&gt;</a>';
            paginationHtml += '</li>';
        }
    
        paginationHtml += '</ul>';
    
        return paginationHtml;
    }
    
});
