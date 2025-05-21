import { Calendar } from '@fullcalendar/core';
import timeGridPlugin from '@fullcalendar/timegrid';
import interactionPlugin from '@fullcalendar/interaction';
import dayGridPlugin from '@fullcalendar/daygrid';
import frLocale from '@fullcalendar/core/locales/fr';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap';
import '@fullcalendar/core/index.css';
import '@fullcalendar/timegrid/index.css';
import '@fullcalendar/daygrid/index.css';

// FONCTION POUR OUVRIR UNE MODALE D'AJOUT
function openAddModal(dateStr, groupId = null) {
    // Crée la modale HTML si elle n’existe pas déjà
    if (!document.getElementById('addEventModal')) {
        let modalHTML = `
<div class="modal fade" id="addEventModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="addEventForm">
        <div class="modal-header"><h5 class="modal-title">Ajouter un planning</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" name="date" value="${dateStr}">
          <input type="hidden" name="groupe" value="${groupId || ''}">
          <div class="mb-2">
            <label>Prénom</label><input class="form-control" name="prenom" required>
          </div>
          <div class="mb-2">
            <label>Nom</label><input class="form-control" name="nom" required>
          </div>
          <div class="mb-2">
            <label>Heure début</label><input class="form-control" name="start" type="time" required>
          </div>
          <div class="mb-2">
            <label>Heure fin</label><input class="form-control" name="end" type="time" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Ajouter</button>
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
        </div>
      </form>
    </div>
  </div>
</div>
`;
        document.body.insertAdjacentHTML('beforeend', modalHTML);
    }
    // Pré-remplis les champs
    let modal = new bootstrap.Modal(document.getElementById('addEventModal'));
    document.querySelector('#addEventModal input[name=date]').value = dateStr;
    document.querySelector('#addEventModal input[name=groupe]').value = groupId || '';
    document.getElementById('addEventForm').onsubmit = function (e) {
        e.preventDefault();
        let form = e.target;
        fetch('/planning/add-ajax', {
            method: 'POST',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify({
                date: form.date.value,
                start: form.start.value,
                end: form.end.value,
                nom: form.nom.value,
                prenom: form.prenom.value,
                groupe: form.groupe.value,
            })
        })
            .then(r => r.json())
            .then(data => {
                if (data.status === 'ok') {
                    modal.hide();
                    window.fullCalendarInstance.refetchEvents();
                } else {
                    alert(data.message || 'Erreur lors de l’ajout');
                }
            });
    };
    modal.show();
}

// INITIALISATION FULLCALENDAR + GESTION GROUPES
document.addEventListener('DOMContentLoaded', function () {
    let groupSelect = document.getElementById('groupe-select');
    let groupe = groupSelect ? groupSelect.value : '';
    let calendarEl = document.getElementById('calendar');
    let calendar = new Calendar(calendarEl, {
        plugins: [dayGridPlugin, timeGridPlugin, interactionPlugin],
        initialView: 'timeGridWeek',
        locale: frLocale,
        timeZone: 'Europe/Paris',
        allDaySlot: false,
        nowIndicator: true,
        slotMinTime: '06:00:00',
        slotMaxTime: '22:00:00',
        headerToolbar: {
            left: 'prev,next today',
            center: 'title',
            right: 'timeGridDay,timeGridWeek,dayGridMonth'
        },
        events: function (info, successCallback, failureCallback) {
            let url = '/planning/events';
            if (groupSelect && groupSelect.value) url += '?groupe=' + groupSelect.value;
            fetch(url)
                .then(r => r.json())
                .then(data => successCallback(data))
                .catch(failureCallback);
        },
        dateClick: function (info) {
            openAddModal(info.dateStr, groupSelect ? groupSelect.value : null);
        },
    });
    window.fullCalendarInstance = calendar;
    calendar.render();

    // Sélection de groupe
    if (groupSelect) {
        groupSelect.addEventListener('change', () => {
            calendar.refetchEvents();
        });
    }
});
