import datepicker from 'js-datepicker';

$(function() {

    if ($('body').hasClass('page-template-page-events')) {
        const start = datepicker('#event_date_start', { id: 1 });
        const end = datepicker('#event_date_end', { id: 1 });
    }

});