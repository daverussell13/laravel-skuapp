/**
 *
 * You can write your JS code here, DO NOT touch the default style file
 * because it will make it harder for you to update.
 *
 */

"use strict";

function deleteFrozenHdl(id) {
    $.ajax(`http://localhost:8000/food/${id}`, {
        type: "DELETE",
        success: function (data, status, xhr) {
            location.reload();
        },
        error: function (jqXhr, textStatus, errorMessage) {
            location.reload();
        },
    });
}
