require('./bootstrap');

try {
    const datepicker = require('js-datepicker');
    $('.datepicker').each((_, el) => {
        datepicker(el, {
            customDays: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],
            customMonths: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro', 'Outubro', 'Novembro', 'Dezembro'],
            formatter: (input, date) => {
                const value = date.toLocaleDateString()
                input.value = value;
            },
        });
    });

    $('[data-confirm]').on('submit', function(e) {
        e.preventDefault();
        if(confirm($(this).data('confirm'))) {
            this.submit();
        }
    });

    $('[data-search-table]').on('keyup', function() {
        const value = $(this).val().toLowerCase();
        const target = $(this).data('search-table');

        $(`${target} tr`).filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });

} catch (err) {}
