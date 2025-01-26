class Calendar {
    constructor() {
        (this.body = document.body),
            (this.calendar = document.getElementById("calendar")),
            (this.formEvent = document.getElementById("forms-event")),
            (this.btnNewEvent = document.getElementById("btn-new-event")),
            (this.btnSaveEvent = document.getElementById("btn-save-event")),
            (this.modalTitle = document.getElementById("modal-title")),
            (this.calendarObj = null),
            (this.selectedEvent = null),
            (this.newEventData = null);
    }
    onEventClick(e) {
        this.formEvent?.reset(),
            this.formEvent.classList.remove("was-validated"),
            (this.newEventData = null),
            (this.modalTitle.text = "Edit Event"),
            this.modal.show(),
            (this.selectedEvent = e.event),
            (document.getElementById("event-title").value =
                this.selectedEvent.title),
            (document.getElementById("event-category").value =
                this.selectedEvent.classNames[0]);
    }
    onSelect(e) {
        this.formEvent?.reset(),
            this.formEvent?.classList.remove("was-validated"),
            (this.selectedEvent = null),
            (this.newEventData = e),
            (this.modalTitle.text = "Add New Event"),
            this.modal.show(),
            this.calendarObj.unselect();
    }
    init() {
        var e = new Date();
        const t = this;

        (t.calendarObj = new FullCalendar.Calendar(t.calendar, {
            plugins: [],
            slotDuration: "00:30:00",
            slotMinTime: "07:00:00",
            slotMaxTime: "19:00:00",
            themeSystem: "default",
            buttonText: {
                today: "Today",
                month: "Month",
                week: "Week",
                day: "Day",
                list: "List",
                prev: "Prev",
                next: "Next",
            },
            initialView: "dayGridMonth",
            handleWindowResize: !0,
            height: window.innerHeight - 300,
            headerToolbar: {
                left: "prev,next today",
                center: "title",
                right: "dayGridMonth,timeGridWeek,timeGridDay,listMonth",
            },
            initialEvents: e,
            editable: !0,
            droppable: !0,
            selectable: !0,
            dateClick: function (e) {
                t.onSelect(e);
            },
            eventClick: function (e) {
                t.onEventClick(e);
            },
        })),
            t.calendarObj.render();
    }
}
document.addEventListener("DOMContentLoaded", function (e) {
    new Calendar().init();
});
