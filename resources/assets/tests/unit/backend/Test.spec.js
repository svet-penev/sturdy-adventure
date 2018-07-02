// Test File "Editor.spec.js"

import Editor from '../../../backend/js/components/TopBarComponent.vue';

describe('Editor', () => {
    it('should set correct default data', function () {
        expect(typeof Editor.data).toBe('function')
        var defaultData = Editor.data()
        expect(defaultData.input).toBe('# Hello!')

    });
});