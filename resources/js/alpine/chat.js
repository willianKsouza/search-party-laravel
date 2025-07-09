export default () => ({
   chatListener(postId) {
            // Escutando canal privado via Laravel Echo + Reverb
            console.log('Escutando canal privado via Laravel Echo + Reverb');
            console.log(postId);
            
            Echo.private(`chat.post.${postId}`)
                .listen('.user.message.sent', (e) => {
                    // this.messages.push(e.message);
                    console.log(e);
                    
                });
        },
});
