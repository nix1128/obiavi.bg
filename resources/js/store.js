export default {
    state: {
        manageState: {
            from: null,
            to: null
        }
    },
    mutations: {
        manageStateMutation(state, result) {
            state.manageState = result;
        }
    },

    actions: {
        manageStateMutation(context, result) {
            context.commit("manageStateMutation", result);
            localStorage.setItem("localState", JSON.stringify(result)); // saved as json
        },

        loadLastState(context) {
            const getState = localStorage.getItem("localState");
            if (getState) {
                context.commit("manageStateMutation", JSON.parse(getState));
            }
        }
    }
};
