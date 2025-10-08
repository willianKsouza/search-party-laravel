export default () => ({
   showParticipants: false,
    showDescription: true,
    toggleDescription() {
        this.showDescription = !this.showDescription;
    },
    toggleParticipants() {
        this.showParticipants = !this.showParticipants;
    },
});