export default () => ({
   showParticipants: false,
    showDescription: false,
    toggleDescription() {
        this.showDescription = !this.showDescription;
    },
    toggleParticipants() {
        this.showParticipants = !this.showParticipants;
    },

});