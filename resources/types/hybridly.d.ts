interface GlobalHybridlyProperties extends App.Data.SharedData {
    flash: {
        success?: string;
        error?: string;
        warning?: string;
        info?: string;
    };
    errors: {[key: string]: string};
}
