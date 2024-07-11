export default function Header() {
    return (
        <div className="w-full sm:fixed sm:top-0 sm:left-0">
            <div className="grid grid-cols-1 md:grid-cols-1 gap-6 lg:gap-8">
                <div className="scale-100 p-6 bg-white dark:bg-gray-800/50 dark:bg-gradient-to-bl from-gray-700/50 via-transparent dark:ring-1 dark:ring-inset dark:ring-white/5 shadow-gray-500/20 dark:shadow-none flex">
                    <div>
                        <h2 className="mt-2 text-xl font-semibold text-gray-900 dark:text-white pl-5">
                            Desafio Br24
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    );
}
