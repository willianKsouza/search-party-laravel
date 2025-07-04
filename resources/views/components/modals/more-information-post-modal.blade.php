<div
    x-cloak
    x-show="post.showModal"
    x-transition
    x-on:click="closeModal"
    class="absolute inset-0 flex items-center justify-center h-screen bg-black/60"
>
    <div
        x-on:click.stop
        x-transition
        class="bg-white dark:bg-gray-800 rounded-lg shadow-lg w-[90%] md:w-[70%] h-[80%] flex flex-col p-6"
    >
        <h2 class="text-xl font-semibold mb-4">Informações do Post</h2>
        <p class="mb-4 text-gray-700 dark:text-gray-300">
            Aqui vai o conteúdo completo do seu post.
        </p>

        <div
            class="flex-1 overflow-y-auto mb-4 space-y-2 p-2 border not-last:border-gray-700 rounded"
        >
            <div class="flex">
                <div
                    class="bg-gray-700 text-gray-200 px-4 py-2 rounded-lg max-w-[70%]"
                >
                    Olá! Como posso te ajudar?
                </div>
            </div>
            <div class="flex justify-end">
                <div
                    class="bg-blue-600 text-white px-4 py-2 rounded-lg max-w-[70%]"
                >
                    Gostaria de saber mais sobre este post.
                </div>
            </div>
        </div>
        <div class="flex space-x-2">
            <input
                type="text"
                placeholder="Digite sua mensagem..."
                class="flex-1 px-4 py-2 border border-gray-700 rounded focus:outline-none focus:ring-2 focus:ring-blue-500 bg-gray-900 text-gray-100"
            />
            <button
                class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700"
            >
                Enviar
            </button>
        </div>
        <button
            x-on:click="closeModal"
            class="mt-4 w-[100px] py-1 border border-red-700 hover:bg-red-900 rounded-md text-white"
        >
            Fechar
        </button>
    </div>
</div>
